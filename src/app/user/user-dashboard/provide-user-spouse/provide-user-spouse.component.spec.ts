import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProvideUserSpouseComponent } from './provide-user-spouse.component';

describe('ProvideUserSpouseComponent', () => {
  let component: ProvideUserSpouseComponent;
  let fixture: ComponentFixture<ProvideUserSpouseComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProvideUserSpouseComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProvideUserSpouseComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
