import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MnPoaComponent } from './mn-poa.component';

describe('MnPoaComponent', () => {
  let component: MnPoaComponent;
  let fixture: ComponentFixture<MnPoaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MnPoaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MnPoaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
