import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MdPoaComponent } from './md-poa.component';

describe('MdPoaComponent', () => {
  let component: MdPoaComponent;
  let fixture: ComponentFixture<MdPoaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MdPoaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MdPoaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
